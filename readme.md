<h1>Projeto de extensão realizado pelo IFSudesteMG para a implementação de um sistema de busca em acervo histórico-textual</h1>

<h4>Instalação do sistema em instância ec2 amazon a partir do ssh:</h4>

<p>1) Instalação do php:</p>

<ul>
	<li>a) sudo apt update</li>
	<li>b) sudo apt install php php-cli php-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath</li>
</ul>

<p>2) Instalação do composer</p>

<ul>
	<li>a) php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"</li>
	<li>b) php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"</li>
	<li>c) php composer-setup.php</li>
	<li>d) php -r "unlink('composer-setup.php');"</li>
	<li>e) mv composer.phar /usr/local/bin/composer (para instalção global do composer)</li>
</ul>

<p>3) Instalação do laravel</p>

<ul>
	<li>a) composer global require laravel/installer</li>
</ul>
