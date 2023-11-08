
#for i in FLAG:
#	print(data.append(ord(i) + 10))

data = [80, 86, 75, 81, 133, 77, 89, 78, 79, 105, 59, 135]

flag = ""

for i in data:
	flag += chr(i - 5)
