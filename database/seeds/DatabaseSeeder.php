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

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Lorem, ipsum dolor.', 'Aperiam, fuga odit at vel sit itaque provident?', '', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo laborum laboriosam exercitationem molestiae iste consectetur laudantium culpa nisi corporis minima. Voluptatem consequatur maiores quo obcaecati, aspernatur expedita unde nobis sequi!
		Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt doloremque rerum quasi obcaecati molestias quod praesentium debitis quam, eum commodi natus quisquam est quas voluptate voluptatum optio dicta eligendi ducimus.
		Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere unde excepturi laboriosam dolorem tempore suscipit rem ad officia, esse debitis mollitia necessitatibus. Illum excepturi explicabo nobis necessitatibus rerum eum autem!
		Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta, explicabo. Sint ullam, sed necessitatibus dignissimos rem ipsum fugiat accusamus in placeat dolore quis ducimus distinctio! Nisi fuga ducimus commodi dicta.
		Unde laboriosam est distinctio voluptate nostrum placeat id dolorem at quisquam iure, consectetur optio asperiores adipisci ipsa! Nesciunt, nihil atque consequuntur deserunt porro nemo. Vitae, totam aliquam. Rerum, officiis dignissimos.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Nemo, labore consectetur!', 'Inventore consectetur sint et in aspernatur, minima odio.', '', 'Consectetur aliquam sequi debitis! Veniam, quo, quas ipsa expedita error ad tenetur ea perspiciatis alias asperiores voluptatibus ipsum vero quia quidem! Vero ea fugit culpa aut corrupti commodi inventore amet?
		Adipisci quisquam doloribus ratione at sequi rerum repudiandae, sed ullam necessitatibus repellendus dicta ut, vero nulla? Ab quaerat alias modi cum impedit quas quidem ut distinctio, facilis qui. Alias, rerum?
		Laudantium at provident libero, maxime tempora totam expedita accusamus aut eum ratione, consequuntur cum temporibus ab atque dicta vero quis reiciendis quas corporis delectus ex modi perferendis. Aspernatur, provident reiciendis.
		Magni recusandae officia cumque illum obcaecati omnis quis distinctio fugit unde iusto labore voluptates praesentium illo eum id, esse autem quod atque, excepturi aliquam! Distinctio maxime et praesentium magnam quod.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Pariatur, suscipit tempore?', 'Inventore natus corporis facere sint commodi! Saepe, dolorum.', '', 'Tenetur suscipit dignissimos maxime aut debitis vel amet? Necessitatibus excepturi, magni quisquam sunt inventore porro obcaecati temporibus ipsam aliquid illum. Et quaerat excepturi nobis voluptates iusto libero quas possimus impedit.
		Nobis labore magni odit sit cupiditate, voluptatem minus unde esse voluptatibus aperiam odio obcaecati earum, suscipit non sint minima fugiat dolorum quaerat? Et quidem blanditiis eaque. Eum sit magni dolor?
		Culpa voluptate officiis, rerum voluptatem eaque aut ullam, totam temporibus adipisci itaque repellat cum quibusdam beatae architecto nesciunt autem facilis fugit quod in, vel debitis officia nihil quidem doloremque. Sint?
		Modi asperiores iure ipsum iste blanditiis, vero voluptas nisi magni ratione voluptatum molestiae doloribus mollitia alias cumque aperiam temporibus non illum nobis deserunt repellendus, harum exercitationem fuga. Porro, dolorum quidem.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Non, culpa reiciendis.', 'Commodi odit itaque ducimus quasi repudiandae, delectus quia.', '', 'Reprehenderit, qui at. Inventore voluptatibus blanditiis a repudiandae qui animi beatae doloribus hic aspernatur alias placeat vel, odio, aliquam, similique accusantium maiores modi sint sit debitis? Provident magni explicabo doloremque.
		Eius temporibus, eum illo porro velit accusamus consequuntur natus rerum adipisci eligendi incidunt consectetur! Magnam ipsam cupiditate totam architecto neque, animi rerum cum, modi possimus itaque rem omnis ipsum aliquam.
		Aliquid amet iste voluptatum, repellat quod deleniti? Voluptatibus illum non eos quasi quam temporibus cum consequatur, nihil quisquam ut delectus minima et? Est incidunt qui tempora at adipisci ad iste.
		Officiis facere, maxime deserunt animi ab odio molestias sit sint saepe, praesentium aperiam dignissimos quod corporis. Iusto dolorem iste placeat ex in aliquid molestias assumenda, quam tenetur provident, expedita praesentium.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Atque, velit alias.', 'Officia dolor, nesciunt tempore labore ea nemo neque.', '', 'Numquam dolore cupiditate exercitationem asperiores excepturi delectus aliquam aperiam voluptate quis, id labore? Eaque libero quis eum magni labore recusandae distinctio. Nam porro quasi, soluta illo quo non illum eveniet?
		Quos cupiditate ab dignissimos ipsa doloremque aperiam optio molestias officia? Quidem consectetur quae nulla, quaerat ut iure temporibus corporis dicta aut odit voluptas tenetur in ratione veniam quos nemo vitae.
		Commodi recusandae nulla, molestias esse iste odio, accusantium sequi, numquam quas quod tempora facilis perspiciatis maxime voluptate soluta doloribus adipisci pariatur laudantium officiis? Fuga, odit rerum suscipit porro assumenda similique!
		Asperiores aliquid maxime rerum velit eaque nulla, facilis iusto, dolorem hic quidem repudiandae magni corrupti, illum quisquam at ducimus vero autem natus? Odio molestiae cupiditate nam tempore sed, exercitationem neque.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Mollitia, consectetur nemo?', 'Debitis exercitationem cumque recusandae totam voluptas, dolorem omnis!', '', 'Molestiae quas quidem esse commodi aliquid suscipit maiores unde minus nihil aspernatur. Error, nisi, doloremque tenetur officia ipsam placeat debitis quo, sapiente autem suscipit quaerat eveniet itaque ipsa eos deserunt.
		Minima porro eaque repudiandae, pariatur voluptatibus eos laboriosam id dolorem corrupti quidem iure at nam repellendus perspiciatis nihil aliquam accusantium. Corrupti, corporis? Non atque optio enim nisi, eius ullam debitis.
		Inventore, voluptatum. Non animi fugit mollitia, nam, corrupti unde quibusdam delectus voluptatibus minus ipsa fugiat est ullam. Commodi modi aut placeat accusamus veniam animi amet unde, eius quisquam minima quasi.
		Molestiae delectus non aut amet ipsa, repellat porro est quisquam nemo voluptas. Cumque incidunt aut, amet consequatur veritatis nisi labore in magni enim excepturi eligendi totam quod hic animi. Enim.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Maxime, assumenda ratione!', 'Provident reprehenderit explicabo enim voluptatum! Obcaecati, repudiandae laboriosam!', '', 'Modi esse numquam obcaecati voluptates vero quisquam aspernatur tempore praesentium! Aspernatur harum quisquam voluptates, adipisci blanditiis saepe quaerat consequuntur, perspiciatis ducimus est recusandae delectus dicta. Impedit, labore veritatis! Expedita, tempora!
		Laborum dolores, ad labore iure ullam provident non nulla iusto unde dolorem corrupti aliquid vel, vero repellat autem assumenda laboriosam tempora iste repellendus voluptate modi quae! Porro hic quidem totam.
		Quibusdam, hic ipsum ipsa eligendi quae veritatis ipsam! Laboriosam obcaecati perferendis cum sapiente autem cumque quia temporibus natus ipsam cupiditate non incidunt eveniet fugit doloremque, soluta commodi aperiam iste veritatis.'));

		DB::insert('insert into noticias (titulo, subtitulo, imagem, texto) values (?, ?, ?, ?)', array('Eligendi, ab saepe!', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.', '', 'Obcaecati repellendus quas exercitationem, unde eaque voluptates optio! Sed rem esse, illo quaerat repellendus doloremque totam itaque deleniti, dolorem necessitatibus dolorum quo saepe, eaque veniam impedit assumenda libero accusantium aperiam. Sequi velit quas ratione, nisi minima quidem dicta iste culpa cumque cupiditate repudiandae laudantium quos magnam molestias labore, aliquam, alias commodi eos architecto voluptatibus excepturi. Perferendis qui in dolorem ratione!
		Officia unde similique consectetur dolorem nostrum reprehenderit enim mollitia, nihil sit aliquam perferendis rerum in quos? Incidunt minus sint veniam, fuga laboriosam veritatis quibusdam! Amet perspiciatis hic in possimus rerum?
		Doloremque excepturi blanditiis corrupti, veritatis tenetur omnis, nam consequatur laboriosam dignissimos eos adipisci ex quisquam ullam ut libero. Natus facilis ut expedita eius consequuntur recusandae eos debitis numquam rerum aut!'));
	}

}