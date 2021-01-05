<?php

namespace App\Console\Commands;

use App\Services\CommentsManager;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class StoreComments extends Command
{
    use CommentsManager;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pworks:store_comments {id} {comment}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store Comments';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $id = $this->argument('id');
            $comment = $this->argument('comment');

            $user = $this->storeComment($id, $comment);
            $this->alert("Comments have been added to {$user->name}");
        } catch (ModelNotFoundException $e) {
            $this->error("Oops! We couldn't find any user with the ID you provided");
        }
        return 0;
    }
}
