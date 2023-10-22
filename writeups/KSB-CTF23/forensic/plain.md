# KSB-CTF23 - forensic - plain


# Introduction

[Файл](files/task.pcapng)


# Solve

Если в дампе трафика, в явном виде, содержится флаг, то можно воспользоваться LIFEхаком c [lucky](lucky.md) :

```
└─$ strings task.pcapng | grep KSB 
KSB{bc89239208609c5d031b74c99a45747d}
```

А на самом деле, можно то же самое и в **wireshark**'e проделать, через поиск. Ничего сверх и низ-сложного :)

Получаем флаг : `KSB{bc89239208609c5d031b74c99a45747d}` 


# Spoiler

Просто ищем **KSB** в файле