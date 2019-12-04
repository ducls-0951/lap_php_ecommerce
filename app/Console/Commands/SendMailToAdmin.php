<?php

namespace App\Console\Commands;

use App\Mail\MailOrderToAdmin;
use App\Repositories\Order\OrderRepositoryInterface;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMailToAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendmailtoadmin:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail To Admin Every Friday';
    protected $orderRepository;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(OrderRepositoryInterface $orderRepository)
    {
        parent::__construct();
        $this->orderRepository = $orderRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $order = $this->orderRepository->getOrderProcess();

        if ($order->count() > config('schedule.count_order')) {
            Mail::to('leduc.kma@gmail.com')->send(new MailOrderToAdmin($order));
            $this->info('Successfully');
        }
    }
}
