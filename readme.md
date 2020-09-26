Projeto de extensão realizado pelo IFSudesteMG para a implementação de um sistema de busca em acervo histórico-textual

Instalação do sistema em instância ec2 amazon a partir do ssh:

1) Instalação do php:

a) sudo apt update
b) sudo apt install php php-cli php-fpm php-json php-pdo php-mysql php-zip php-gd  php-mbstring php-curl php-xml php-pear php-bcmath

2) Instalação do composer

a) php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
b) php -r "if (hash_file('sha384', 'composer-setup.php') === '795f976fe0ebd8b75f26a6dd68f78fd3453ce79f32ecb33e7fd087d39bfeb978342fb73ac986cd4f54edd0dc902601dc') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
c) php composer-setup.php
d) php -r "unlink('composer-setup.php');"
e) mv composer.phar /usr/local/bin/composer (para instalção global do composer)

3) Instalação do laravel

a) composer global require laravel/installer