# KSB-CTF23 - misc - noise


# Introduction

[Файл](files/noise.7z)


# Solve

Распаковываем архив. Видим множество директорий. Первое, что приходит в голову - заменить их hex-названия на символы:

```
import os
import codecs

directories = os.listdir("secret")

for directory in directories:

	directory_in_bytes = bytes.fromhex(directory)
	decoded_directory = directory_in_bytes.decode("ascii")

	print("[ " + directory + " ] <=> ", decoded_directory)

	os.system(f"mv secret/{directory} secret/{decoded_directory}")
```

Получаем такую картину:

```
└─$ python3 UnNoise.py         
[ 2e ] <=>  .
mv: 'secret/2e' и 'secret/./2e' - один и тот же файл
[ 73 ] <=>  s
[ 38 ] <=>  8
[ 20 ] <=>   
mv: 'secret/20' и 'secret/20' - один и тот же файл
[ 7b ] <=>  {
[ 4c ] <=>  L
[ 35 ] <=>  5
[ 6d ] <=>  m
[ 6e ] <=>  n
[ 33 ] <=>  3
[ 44 ] <=>  D
[ 70 ] <=>  p
[ 75 ] <=>  u
[ 32 ] <=>  2
[ 6c ] <=>  l
[ 72 ] <=>  r
[ 2c ] <=>  ,
[ 66 ] <=>  f
[ 63 ] <=>  c
[ 78 ] <=>  x
[ 4b ] <=>  K
[ 64 ] <=>  d
[ 7d ] <=>  }
[ 76 ] <=>  v
[ 69 ] <=>  i
[ 53 ] <=>  S
[ 30 ] <=>  0
[ 6f ] <=>  o
[ 61 ] <=>  a
[ 67 ] <=>  g
[ 71 ] <=>  q
[ 65 ] <=>  e
[ 45 ] <=>  E
[ 42 ] <=>  B
[ 36 ] <=>  6
[ 62 ] <=>  b
[ 39 ] <=>  9
[ 37 ] <=>  7
[ 31 ] <=>  1
[ 55 ] <=>  U
[ 68 ] <=>  h
[ 74 ] <=>  t
```

Директории с именами **20** и **2e** - заменим на директории с именами ` ` и `Tochka`. (Как выяснится позже, они и не понадобятся)

Теперь видим, что имена папок, возможно при правильном составлении дадут флаг.

```
└─$ ls       
 ,  '{'  '}'   0   1   2   3   5   6   7   8   9   a   b   B   c   d   D   e   E   f   g   h   i   K   l   L   m   n   o   p   q   r   s   S   t   u   U   v   x
```

Хмм, как-же понять, какие буквы и как сопоставлять?

Формат флага : `KSB{...}`

Давайте посмотрим содержимое папок **K** **S** **B** **{** **}**

 Название директории | Содержание |
|--------------------|------------|
|		K  			 |	445		  |
|		S  			 |	446		  |
|		B  			 |	447		  |
|		{  			 |	448		  |
|		...  		 |	...		  |
|		}			 |	481		  |

Быть может названия файлов в папках - индекс в строке? Если так, то наш флаг будет начинатся с **445** по **481**. 

Остаётся два варианта:

	1) Перебрать все папки с их индексами. Занести в кортеж (номер - буква) и вывести значения с **445** по **481**.
	2) Искать все файлы с названиями с **445** по **481** в папках. Записывать в флаг поочерёдно найденую папку.


Я решал 1-ым вариантом, хотя второй более правильный и лёгкий:

```
import os
import codecs

directories = os.listdir("secret")

flag = {}
start_index = 0 	# index - K
finish_index = 0	# index - }

for directory in directories:


	for index in os.listdir(f"secret/{directory}"):

		flag[int(index)] = directory

		if (directory == 'K'): 
			start_index = int(index)

		if (directory == '}'): 
			finish_index = int(index)
			break



result = ""

for i in range(start_index, finish_index + 1): result = result + flag[i]

print(result)
```

Результат:

```
└─$ python3 decode.py 
KSB{c98f5363807f211d65f7bce9bf333e9e}
```




Получаем флаг : `KSB{c98f5363807f211d65f7bce9bf333e9e}` 


# Spoiler

Переименовываем все директории из hex'ов. Идём с **445** по **481** файлы и сопоставляем каждому файлу - имя его директории