<h1>Projeto de extensão realizado pelo IFSudesteMG para a implementação da Juizforana - Hemeroteca Digital de Juiz de Fora</h1>

<h3>Ciclos de desenvolvimento</h3>

<h5>Criação de feature branches</h5>

<p>A branch <code>master</code> é versão de produção. Novas funcionalidades <strong>DEVEM</strong> ser desenvolvidas em <code>feature branches</code> criadas a partir da branch <code>development</code>. Para criar uma branch local a partir de development:</q>

<code>git checkout -b &lt;new-feature-branch-name&gt; &lt;development&gt;</code>

<p>Isso irá criar uma nova feature branch a partir de <code>dev</code>.</p>
<p>Dar push apenas nos arquivos relativos ao trabaho na <code>feature branch</code></p>
<p>Não add arquivos de configuração<qp>

<p>Pushing uma branch local para remote:</p>

<code>git push -u origin &lt;branch-name&gt;</code>

<h5>Pull requests e merging</h5>

<p>Após dar o merge de uma <code>feature branch</code> em <code>development</code> é <strong>NECESSÁRIO APAGAR</strong> a <code>feature branch</code> criada.</p>
<p>Após dar o merge da branch <code>development</code> na branch <code>master</code>, <strong>NÃO</strong> apagar a branch <code>development</code></p>
<p></p>
<p></p>

<h4>Configuração do amazon-ec2/php/apache a partir do ssh:</h4>

<ol>
	<li>Instalação do php:
		<ul>
			<li>sudo apt update</li>
			<li>sudo apt install php7.4-cli</li>
			<li>sudo apt install php-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath</li>
			<li>sudo apt-get install libapache2-mod-php</li>
		</ul>
	</li>
	<li>Instalação do composer
		<ul>
			<li>Visitar https://getcomposer.org/download/</li>
			<li>Copiar e executar as lihas de instalação</li>
			<li>sudo mv composer.phar /usr/local/bin/composer (para instalção global do composer)</li>
		</ul>
	</li>
	<li>Instalação do laravel
		<ul>
			<li>composer global require laravel/installer</li>
		</ul>
	</li>
	<li>Instalação do mysql
		<ul>
			<li>sudo apt-get install mysql-server mysql-client</li>
			<li>sudo mysql_secure_installation</li>
			<li>CREATE USER 'algumusuario'@'localhost' IDENTIFIED BY 'algumapassword';</li>
			<li>GRANT ALL PRIVILEGES ON * . * TO 'algumusuario'@'localhost';</li>
		</ul>
	</li>
	<li>Instalação do apache
		<ul>
			<li>sudo apt-get install apache2</li>
			<li>sudo nano /etc/apache2/apache2.conf</li>
			<li>Adicionar:</li>
			<li>		
			<code>
				&lt;Directory /var/www/&gt;
					Options Indexes FollowSymLinks
					AllowOverride All
					Require all granted
				&lt;/Directory&gt;
			</code><br>
			</li>
		</ul>
	</li>
	<li>Baixar e instalar repositório
		<ul>
			<li>cd /var/www/html/</li>
			<li>sudo git clone https://github.com/GioSF/biblioweb.git</li>
			<li>cd biblioweb</li>
			<li>sudo composer install</li>
			<li>sudo mkdir storage</li>
			<li>sudo chmod -R 775 storage/</li>
			<li>chmod -R 775 bootstrap/</li>
			<li>sudo chmod -R 755 /var/www</li>
		</ul>
	</li>
	<li>Definir serviço
		<ul>
			<li>sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/biblioweb.conf</li>
			<li>sudo nano /etc/apache2/sites-available/biblioweb.conf</li>
			<li>Adicionar à biblioweb.conf</li>
			<li>
				<code>
					&lt;VirtualHost *:80&gt;<br>
					&emsp;ServerName (adicionar Public IPv4 DNS ou domínio)<br>
					&emsp;ServerAdmin webmaster@thedomain.com<br>
					&emsp;DocumentRoot /var/www/html/biblioweb/public<br>
					&emsp;&emsp;&lt;Directory /var/www/html/biblioweb&gt;<br>
					&emsp;&emsp;&emsp;AllowOverride All<br>
					&emsp;&emsp;&lt;/Directory&gt;<br>
					&emsp;ErrorLog ${APACHE_LOG_DIR}/error.log<br>
					&emsp;CustomLog ${APACHE_LOG_DIR}/access.log combined<br>
					&lt;/VirtualHost&gt;
				</code><br>
			</li>
			<li>sudo a2dissite 000-default.conf</li>
			<li>sudo a2ensite biblioweb.conf</li>
			<li>sudo a2enmod rewrite</li>
			<li>sudo systemctl restart apache2</li>
		</ul>
	</li>
	<li>Definir permissões
		<ul>
			<li>cd /var/www/html/biblioweb/storage execute: sudo mkdir -p framework/{sessions,views,cache}</li>
			<li>chmod -R 775 sessions, views, cache</li>
			<li>No diretório biblioweb/ execute: composer install</li>
			<li>Alterar bootstrap/cache/config.php session array: de 'driver' => 'file' para 'driver' => 'cookie'</li>
			<li>sudo systemctl restart apache2</li>
			<li>sudo mkdir /var/www/html/biblioweb/storage/framework/cache/data</li>
		</ul>
	</li>
	<li>Criar banco de dados
		<ul>
			<li>Acessar terminal do mysql</li>
			<li>CREATE DATABASE biblioweb;</li>
			<li>No diretório biblioweb/ execute: composer install</li>
			<li>Alterar bootstrap/cache/config.php session array: de 'driver' => 'file' para 'driver' => 'cookie'</li>
			<li>sudo systemctl restart apache2</li>
		</ul>
	</li>
</ol>

<p>Debug tools</p>
	<ul>
	<li>cd /etc/apache2 | apache2ctl configtest</li>
	</ul>
