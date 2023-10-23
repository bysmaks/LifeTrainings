FROM ubuntu:latest

COPY ./app /app
WORKDIR /app

RUN  export DEBIAN_FRONTEND=noninteractive
ENV  DEBIAN_FRONTEND noninteractive

COPY ./src/supervisord.conf /etc/supervisor.conf
COPY ./src/sshd.conf /etc/supervisor/conf.d/sshd.conf
COPY ./src/appserver.conf /etc/supervisor/conf.d/supervisor.conf

RUN apt update && \
    apt upgrade -y && \
    apt install -y rpl python3-pip openssh-server supervisor sudo npm nodejs && \
    python3 -m pip install flask gunicorn 

RUN rpl "PermitRootLogin without-password" "PermitRootLogin yes" /etc/ssh/sshd_config
RUN sed -i "s/.*PasswordAuthentication.*/PasswordAuthentication no/g" /etc/ssh/sshd_config

RUN echo 'appserver ALL=(ALL) NOPASSWD: /app/, /usr/bin/pip install *' >> /etc/sudoers

RUN mkdir /var/run/sshd
RUN useradd appserver -G sudo -m
RUN echo appserver:27433c6e38b60ff23d7fe3411d9a9b38 | chpasswd
RUN chown -R appserver:appserver /app

RUN echo 89ea118d7b1bc58181380be531021641 >> /home/appserver/user.txt
RUN chmod o+r /home/appserver/user.txt
RUN echo 27503b81ee5e586164df85586b2e5192 >> /root/root.txt

CMD ["supervisord", "-c", "/etc/supervisor.conf"]
