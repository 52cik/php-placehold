/1
/100
/200x200
/800x320

/111/aaa
/222/aaa/FFF
/333/a1a1a1/b2b2b2

/111x222/333
/111x222/aaa/BBB
/111x222/a1a1a1/b2b2b2

/200.jpg
/200/aaa.gif
/200/aaa/bbb.png

/200x200.jpg
/200x200/aaa.gif
/200x200/aaa/bbb.png


/200?text=hello%20world
/200/aaa?text=hello%20world
/200/aaa/bbb?text=hello%20world
/200/aaa/bbb.jpg?text=hello%20world
/300x200/369/fff.jpg?text=hello%20world


/^\/(\d+)(?:x(\d+)|)(?:\/([\da-f]{3}|[\da-f]{6})|)(?:\/([\da-f]{3}|[\da-f]{6})|)(?:\.(jpg|png|gif)|)$/i
