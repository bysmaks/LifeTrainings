FROM ubuntu:20.04

ENV TZ=America/Los_Angeles
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt update && apt install -y python3-pip python3-dev sudo nano openssh-server rpl net-tools
RUN python3 -m pip install flask

RUN rpl "PermitRootLogin without-password" "PermitRootLogin yes" /etc/ssh/sshd_config
RUN sed -i "s/.*PasswordAuthentication.*/PasswordAuthentication no/g" /etc/ssh/sshd_config

RUN useradd server -G sudo -m
RUN echo server:7ff83078fb31412963921e569248128a | chpasswd
RUN echo "server ALL=(ALL:ALL) NOPASSWD:/usr/bin/nano" > /etc/sudoers
RUN echo 'CTFNSK99b63064fd94bfe22cdb4ed306e25fe4' > /root/flag.txt
RUN echo 'CTFNSK1dfb80334a74c4ee5ae54d55299037c3' > /home/server/flag.txt
RUN chmod ou+r /home/server/flag.txt

USER server
RUN mkdir /home/server/.ssh && chmod 0700 /home/server/.ssh
RUN ssh-keygen -q -t rsa -f /home/server/.ssh/id_rsa
ADD ./app /home/server

WORKDIR /home/server

CMD ["/usr/sbin/sshd","-D"]
ENTRYPOINT [ "python3", "app.py" ]
