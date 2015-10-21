all: test

test:
	- echo "Hey there, lets test this thing"

clean:
	find . -name '*~' -exec rm {} \;