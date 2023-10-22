# KSB-CTF23 - crypto - simple crypto


# Introduction

```
[Файл_1](files/enc-2.py)
[Файл_2](files/flag.enc)
```


# Solve

Проанализируем шифровальщик **enc-2.py**:

```
f = open("flag.txt","r")
lines = f.readlines()
for c in lines[0]:
	print(ord(c)*2,"", end='')
```

Открывается файл и каждый символ переводится в код ascii и умножается на 2. Пора нам поделить всё попалам :)

```
doubled_ascii = open('flag.enc', 'r').read().split()

# Convert the ASCII values back to integers
original_ascii_values = [int(value) // 2 for value in doubled_ascii]

# Convert ASCII values to characters
original_characters = [chr(value) for value in original_ascii_values]

print(''.join(original_characters))
```

Результат:

```
└─$ python3 2.py     
KSB{1ed0e3c4c173f031305c27bda2f7a0ee}
```

Получаем флаг : `KSB{1ed0e3c4c173f031305c27bda2f7a0ee}` 


# Spoiler

Переводим делим на 2 каждое число и переводим в символы из ascii кода