<h1>Projeto de extensão realizado pelo IFSudesteMG para a implementação de um sistema de busca em acervo histórico-textual</h1>

<h4>Configuração do ec2/php/apache a partir do ssh:</h4>

<p>1) Instalação do php:</p>

<ul>
	<li>sudo apt update</li>
	<li>sudo apt install php7.4-cli</li>
	<li>sudo apt install php-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath</li>
</ul>

<p>2) Instalação do composer</p>

<ul>
	<li>php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"</li>
	<li>php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"</li>
	<li>php composer-setup.php</li>
	<li>php -r "unlink('composer-setup.php');"</li>
	<li>sudo mv composer.phar /usr/local/bin/composer (para instalção global do composer)</li>
</ul>

<p>3) Instalação do laravel</p>

<ul>
	<li>composer global require laravel/installer</li>
</ul>

<p>4) Instalação do mysql</p>

<ul>
	<li>sudo apt-get install mysql-server mysql-client</li>
</ul>

<p>4) Instalação do apache</p>

<ul>
	<li>sudo apt-get install apache2</li>
</ul>

<p>5) Baixar e instalar repositório</p>

<ul>
	<li>cd /var/www/html/</li>
	<li>sudo git clone https://github.com/GioSF/biblioweb.git</li>
	<li>cd biblioweb</li>
	<li>sudo composer install</li>
	<li>sudo mkdir storage</li>
	<li>sudo chmod -R 775 storage/</li>
</ul>

<p>5) Definir serviço</p>


<p>Adicionar à biblioweb.conf</p>
	<code><VirtualHost *:80></code>
	<code>ServerName 3.22.51.93</code>
	<code>ServerAdmin webmaster@thedomain.com</code>
	<code>DocumentRoot /var/www/html/biblioweb/public</code>
	<code><Directory /var/www/html/biblioweb></code>
	<code>AllowOverride All</code>
	<code></Directory></code>
	<code>ErrorLog ${APACHE_LOG_DIR}/error.log</code>
	<code>CustomLog ${APACHE_LOG_DIR}/access.log combined</code>
	<code></VirtualHost></code>

<ul>
	<li>sudo a2dissite 000-default.conf</li>
	<li>sudo a2ensite biblioweb.conf</li>
	<li>sudo a2enmod rewrite</li>
	<li>sudo systemctl restart apache2</li>
</ul>
