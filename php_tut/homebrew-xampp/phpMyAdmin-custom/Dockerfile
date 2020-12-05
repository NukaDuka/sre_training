FROM phpmyadmin/phpmyadmin:5.0.3

COPY ./sources.list /etc/apt/sources.list
COPY ./apache2.conf /etc/apache2/apache2.conf
COPY ./docker-entrypoint.sh /docker-entrypoint.sh

ENV TERM=xterm-256color
ARG DEBIAN_FRONTEND=noninteractive

RUN chown -R nobody:nogroup /tmp && cd /tmp && apt-get update && apt-get install -y --reinstall -o APT::Immediate-Configure=false gcc-8-base libc6 libnss-nis && apt-get full-upgrade -y && \
    apt-get install -y wget unzip make nano man ucf psmisc libgdbm-dev libgdbm6 zlib1g zlib1g-dev lib32z1-dev libssl-dev libgd-perl libjpeg62-turbo-dev libfreetype-dev libfreetype6 libpng-dev libpng-tools libpng16-16 \
    libgeoip1 libgd3 expat libexpat1 libexpat1-dev libxml2 libxml2-dev libxml2-utils libncurses6 libncursesw6 libncurses-dev  && \
    wget https://github.com/libgd/libgd/releases/download/gd-2.3.0/libgd-2.3.0.tar.gz && tar xvzf libgd-2.3.0.tar.gz && cd libgd-2.3.0 && ./configure --enable-jpeg && make && make install && cd /tmp &&\
    curl -o sqlite-autoconf-3330000.tar.gz -s https://www.sqlite.org/2020/sqlite-autoconf-3330000.tar.gz && \
    tar xvfz sqlite-autoconf-3330000.tar.gz && cd sqlite-autoconf-3330000 && \
    CFLAGS="-DSQLITE_ENABLE_COLUMN_METADATA=1" ./configure --prefix=/usr/local && make && make install && cd /tmp && \
    curl -o php-common_76_all.deb -s http://ftp.debian.org/debian/pool/main/p/php-defaults/php-common_76_all.deb && dpkg -i php-common_76_all.deb && \
    curl -o php7.4-common_7.4.11-1_amd64.deb -s http://ftp.debian.org/debian/pool/main/p/php7.4/php7.4-common_7.4.11-1_amd64.deb && dpkg -i php7.4-common_7.4.11-1_amd64.deb && \
    curl -o php7.4-sqlite3_7.4.11-1_amd64.deb -s http://ftp.debian.org/debian/pool/main/p/php7.4/php7.4-sqlite3_7.4.11-1_amd64.deb && dpkg -i php7.4-sqlite3_7.4.11-1_amd64.deb && \
    curl -o php7.4-gd_7.4.11-1_amd64.deb -s http://ftp.debian.org/debian/pool/main/p/php7.4/php7.4-gd_7.4.11-1_amd64.deb && dpkg -i php7.4-gd_7.4.11-1_amd64.deb &&\
    curl -o webalizer_2.23.08-3.1_amd64.deb -s  http://ftp.debian.org/debian/pool/main/w/webalizer/webalizer_2.23.08-3.1_amd64.deb && dpkg -i webalizer_2.23.08-3.1_amd64.deb &&\
    apt-get install -y apache2-dev freetds-bin freetds-common freetds-dev gettext\
    gettext-base libc-client2007e libc-client2007e-dev ldap-utils libldap-2.4-2 libldap-common libldap2-dev slapd mcrypt libmhash-dev libmhash2 libxslt1-dev libxslt1.1 xsltproc libapache2-mod-apreq2 \
    libapreq2-3 libapreq2-dev libapache2-request-perl icu-devtools libicu-dev libicu67 libapr1 libapr1-dev libaprutil1 libaprutil1-dbd-mysql libaprutil1-dbd-sqlite3 libaprutil1-dev libaprutil1-ldap && \
    echo deb http://deb.debian.org/debian experimental main >> /etc/apt/sources.list && apt-get update && apt-get -t experimental install -y perl libperl-dev libperl5.32 && \
    apt-get install -y proftpd-basic proftpd-mod*   

RUN cpan -i CPAN::DistnameInfo Bundle::Apache2 && cpan -i Net::SSLeay GD XML::Parser XML::LibXML LWP::UserAgent Curses && cpan -i Locale::gettext XML::LibXSLT && cd / && rm -rf /tmp && mkdir /tmp && apt-get autoremove -y && chmod 777 /tmp && mkdir /var/www/html/php_tut && chmod 755 /var/www/html/php_tut

ENTRYPOINT [ "/docker-entrypoint.sh" ]
CMD ["apache2-foreground"]
