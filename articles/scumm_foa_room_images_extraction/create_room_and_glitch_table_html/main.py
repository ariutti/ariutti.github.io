import os, csv

ROOM_IMAGES_FOLDER   = "../images/backgrounds"
ROOM_IMAGES_GLITCH_FOLDER = "../images/backgrounds_codec1_glitch"
RNAM_CSV = "RNAM.csv"

def enterFolderAndGetListOfImages( folder ):
	os.chdir( folder )
	#print( "Entering folder {}".format(os.getcwd()) )

	PNG_LIST = [f for f in os.scandir( os.getcwd()) if ( f.is_file() and f.name.lower().endswith(".png") ) ]
	return PNG_LIST


if __name__ == "__main__":
	currentDirectory = os.getcwd()
	CSV_FILE = os.path.join( currentDirectory, RNAM_CSV )
	ROOM_IMAGES_FOLDER_FULLPATH   = os.path.join( currentDirectory, ROOM_IMAGES_FOLDER)
	ROOM_GLITCHES_FOLDER_FULLPATH = os.path.join( currentDirectory, ROOM_IMAGES_GLITCH_FOLDER)

	#get a list of all room images
	ROOM_IMAGES_LIST = enterFolderAndGetListOfImages( ROOM_IMAGES_FOLDER_FULLPATH )
	GLITCHES_IMAGES_LIST = enterFolderAndGetListOfImages( ROOM_GLITCHES_FOLDER_FULLPATH )

	os.chdir( currentDirectory )

	print(f'<table id="image_backgrounds_codec1_glitch_table">')

	with open( CSV_FILE, newline='') as csvfile:
		csvreader = csv.reader(csvfile, delimiter=',')

		# skip header
		next(csvreader)

		print(f"\t<tr>")
		#print(f"\t<td>Original background Image</td>")
		print(f"\t<td>Codec1 glitch Image</td>")
		print(f"\t</tr>")

		for i, row in enumerate( csvreader ):
			#print(f" row {i} - {row}")
			room_number = row[0].strip()
			room_name   = row[1].strip()

			background_image_name  = None
			glitch_image_name  = None

			# look for corresponding image
			for f in ROOM_IMAGES_LIST:
				#print( f )
				#get room munber for file
				roomNumberImage = f.name.split("_")[0][4:]
				#print( roomNumberImage )

				if room_number == roomNumberImage:
					background_image_name = f.name
					break

			for f in GLITCHES_IMAGES_LIST:
				#print( f )
				#get room munber for file
				roomNumberImage = f.name.split("_")[0][4:]
				#print( roomNumberImage )

				if room_number == roomNumberImage:
					glitch_image_name = f.name
					break

			#print( f"{room_number}\t{room_name}\t{background_image_name}\t{palette_image_name}")

			#print(f"\t<tr><td>{room_number}</td><td>{room_name}</td>")

			if room_name == "#N/A":
				#print(f"\t<td>This room doesn't exists in game data.</td>")
				continue
			elif room_name == "end-volca" or room_name == "end-v2___" or room_name == "_________":
				continue
				#print(f"\t<td>")
				#print(f'\t<?php img("images/backgrounds/{background_image_name}", 2, "margin-top: 1ch; margin-bottom:1ch;");?>')
				#print(f"\t</td>")
			else:
				print(f"\t<tr>")
				#print(f"\t<td>")
				#print(f'\t<?php img("images/backgrounds/{background_image_name}", 80, "margin-top: 1ch; margin-bottom:1ch;");?>')
				#print(f"\t</td>")

				print(f"\t<td>")
				print(f'\t<?php img("images/backgrounds_codec1_glitch/{glitch_image_name}", 100, "margin-top: 1ch; margin-bottom:1ch;");?>')
				print(f"\t</td>")

				print(f"\t</tr>\n")

		print("</table>")




"""
		#skip the first CSV rows (descriptive)
		next(csvreader)
		next(csvreader)
		next(csvreader)
		next(csvreader)

	for f in IMAGE_LIST:
		print( f )
		#get room munber for file
		roomName = f.name.split("_")[0][4:]
		print( roomName )
"""
