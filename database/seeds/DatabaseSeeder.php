<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call(FichasTableSeeder::class);
		$this->call(NoticiasTableSeeder::class);
	}
}

class NoticiasTableSeeder extends Seeder
{

	public function __construct()
	{

	}	

	public function run()
	{
		Eloquent::unguard();

		DB::table('noticias')->insert([
			'titulo'        => 'Lorem, ipsum dolor',
			'subtitulo'        => 'Aperiam, fuga odit at vel sit itaque provident?',
			'imagem'        => '',
			'texto'    => 'Impedit a doloremque aspernatur vitae nemo ipsam sapiente ad unde velit sed minima, illo esse rerum earum consectetur, eius nam officia similique totam. Unde quae ipsam harum iure fugit magnam!
			Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, explicabo. Sint ullam, sed necessitatibus dignissimos rem ipsum fugiat accusamus in placeat dolore quis ducimus distinctio! Nisi fuga ducimus commodi dicta.
			Unde laboriosam est distinctio voluptate nostrum placeat id dolorem at quisquam iure, consectetur optio asperiores adipisci ipsa! Nesciunt, nihil atque consequuntur deserunt porro nemo. Vitae, totam aliquam. Rerum, officiis dignissimos.',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

		DB::table('noticias')->insert([
			'titulo'        => 'Lorem dolor.',
			'subtitulo'        => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eveniet, reiciendis.',
			'imagem'        => '',
			'texto'    => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officia nulla itaque aliquam rem quisquam ullam magnam debitis nesciunt nisi totam, optio cumque saepe ipsum doloribus, voluptatum illum provident rerum natus!Enim quos, eaque eveniet quae iure ex facere assumenda magnam doloribus, commodi corrupti rem dolorem! Quas odit eaque illum ipsa veniam explicabo enim consequatur amet nihil qui, deserunt libero sint?',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

		DB::table('noticias')->insert([
			'titulo'        => 'Repellat, dolores officia.',
			'subtitulo'        => 'fuga deleniti consectetur nostrum perferendis ea enim dolores et numquam.',
			'imagem'        => '',
			'texto'    => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae eum architecto ipsam obcaecati eaque dolorum natus, sequi facere inventore ducimus, fuga deleniti consectetur nostrum perferendis ea enim dolores et numquam.',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

		DB::table('noticias')->insert([
			'titulo'        => 'Consequuntur, consequatur natus.',
			'subtitulo'        => 'Distinctio inventore suscipit tempora dolore modi',
			'imagem'        => '',
			'texto'    => 'Distinctio inventore suscipit tempora dolore modi, quis cupiditate quasi aut sapiente quos illo totam veritatis similique impedit delectus cumque et ab odio dignissimos. Aperiam aspernatur, aliquam maxime voluptas sapiente quas.',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

		DB::table('noticias')->insert([
			'titulo'        => 'Ipsam, soluta esse.',
			'subtitulo'        => 'Nam maiores tempora doloremque odit quae debitis quisquam autem natus obcaecati excepturi.',
			'imagem'        => '',
			'texto'    => 'Nam maiores tempora doloremque odit quae debitis quisquam autem natus obcaecati excepturi. Suscipit quas recusandae reiciendis perferendis nulla distinctio, odio nesciunt fugiat aperiam magni assumenda asperiores, ipsum velit provident inventore.',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

		DB::table('noticias')->insert([
			'titulo'        => 'Quas, aliquam neque.',
			'subtitulo'        => 'Dolorum amet reiciendis voluptate nulla laboriosam tempora sit',
			'imagem'        => '',
			'texto'    => 'Dolorum amet reiciendis voluptate nulla laboriosam tempora sit, minus cupiditate accusantium sapiente quo repellendus corporis nemo, quidem harum quae. Adipisci culpa, cumque ducimus suscipit expedita soluta dolorem ab eius placeat!',
			'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
			'updated_at' => \Carbon\Carbon::now()->toDateTimeString()		
		]);

	}

}