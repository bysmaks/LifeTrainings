# KSB-CTF23 - stego - meta


# Introduction

[Файл](files/meta.jpg)


# Solve

Как полагается, по обычаю, смотрим картинки в **stegsolve** и перебираем режимы, но я рискну и сразу посмотрю **метаданные**, ибо название явно отсылает к этому)


```
└─$ exiftool files/meta.jpg 
ExifTool Version Number         : 12.57
File Name                       : meta.jpg
Directory                       : files
File Size                       : 182 kB
File Modification Date/Time     : 2023:10:21 13:36:20+07:00
File Access Date/Time           : 2023:10:22 23:32:02+07:00
File Inode Change Date/Time     : 2023:10:22 23:32:02+07:00
File Permissions                : -rw-r--r--
File Type                       : JPEG
File Type Extension             : jpg
MIME Type                       : image/jpeg
Exif Byte Order                 : Big-endian (Motorola, MM)
Artist                          : KSB{d23d309584d5d149cfc57d61d2992198}
```

Получаем флаг : `KSB{d23d309584d5d149cfc57d61d2992198}` 


# Spoiler

Смотрим метаданные