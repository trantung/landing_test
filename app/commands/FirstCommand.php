<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class FirstCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'user:active';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

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
	 * @return mixed
	 */
	public function fire()
	{
		//chạy cron để update toàn bộ các học sinh nhận được email confirm buổi học nhưng chưa xác nhận vào lúc 23:59
		ScheduleDetail::where('status', WAIT_CONFIRM_FINISH)->update(['status' => FINISH_LESSON]);
		//backup db
		$filename='database_backup.sql';
		// dd(public_path());
		$path = public_path();
		$script = 'mysqldump --user=root --password=4JAGVVLHYnKB7GtA --host=localhost schedule_1 > '.$path.'/file.sql';
		exec($script);

		// $result=exec('mysqldump schedule_1 --password=root --user=root --single-transaction >/Applications/MAMP/htdocs/schedule/'.$filename,$output);
		// $result=exec('mysqldump -u root -p root DATABASE_NAME schedule_1 -r --single-transaction >/Applications/MAMP/htdocs/schedule/'.$filename,$output);
		// if ($output == '') {
		// 	dd(111);
		// } else {
		// 	dd(555);
		// }
		// $connection = new DataBackup('localhost',"schedule_1",'root', 'root');
		// $connection->backup_tables();
		// dd(11);
		// $connection->closeConnection();
		// backup_tables();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('example', null, InputOption::VALUE_OPTIONAL, 'An example option.', null),
		);
	}

}
