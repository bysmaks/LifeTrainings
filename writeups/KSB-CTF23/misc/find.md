# KSB-CTF23 - misc - find


# Introduction

[Файл](files/find.zip)



# Solve

Распаковываем архив. Видим множество директорий, а в них файлы. Наверно флаг лежит в одном из файлов.

```
└─$ grep -r 'KSB' *
grep: find/4/5/f/file: двоичный файл совпадает
find/f/5/0/1/file:KSB{bb5858a5e2e386d5dc9bbb3c1390c43c}
grep: find.zip: двоичный файл совпадает
```

Получаем флаг : `KSB{bb5858a5e2e386d5dc9bbb3c1390c43c}` 


# Spoiler

Ищем флаг через **find** или **grep**