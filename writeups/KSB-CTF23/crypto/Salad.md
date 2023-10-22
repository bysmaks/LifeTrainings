# KSB-CTF23 - crypto - Salad


# Introduction

```
WEZPe3BzcjY4MDExNjBzc3M3cDIzNzY0MTI3cXEwczYwODg1fQo=
```


# Solve

Либо сразу догадываемся, либо через **Magic** В **CyberChef**, что это **Base64**. Декодируем:

```XFO{psr6801160sss7p23764127qq0s60885}```


Наш флаг должен быть в виде ```KSB{...}```

Символы `{` и `}` не зашифровались. Можно попробовать предположить, что шифруются только буквы.

Попробуем классику: **Шифр Цезаря**

https://www.dcode.fr/caesar-cipher



На 13 сдвиге видим флаг)


Получаем флаг : `KSB{cfe6801160fff7c23764127dd0f60885}` 


# Spoiler

Декодирование Base64 + ROT13