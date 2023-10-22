# KSB-CTF23 - forensic - lucky


# Introduction

[Файл](files/task.bin)


# Solve

Смотрим, что за файл мы скачали:

```
$ file task.bin  

task.bin: LUKS encrypted file, ver 2, header size 16384, ID 3, algo sha256, salt 0x4dcd3434905770d0..., UUID: 28278ffd-a772-4058-ad7a-7bbba01da63b, crc 0xcbdbb9c9501785c2..., at 0x1000 {"keyslots":{"0":{"type":"luks2","key_size":64,"af":{"type":"luks1","stripes":4000,"hash":"sha256"},"area":{"type":"raw","offse
```

Обращаем внимание на **LUKS**. Гуглим, и находим, что благодаря нему, создаются и также расшифровываются шифрованные разделы. Тавтология(
Попробуем его расшифровать, и видим, что у нас просят парольную фразу. Пробуем ничего не вводить. Неверно...
Пробуем **lucky** - Неверно...
Где ещё достать пароль - не знаю, а задание оценивается в 50 очков, что мало. Значит что-то простое.

А может просто просмотреть код файла на содержание **KSB**?

```
└─$ strings task.bin | grep 'KSB'
z!~0KSB
KSB{9369bbf580daf4c52288f951dd547b37}
```


Получаем флаг : `KSB{9369bbf580daf4c52288f951dd547b37}` 


# Spoiler

Просто ищем **KSB** в файле