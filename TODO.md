# Web Font Exhibition

The goal of this document is mainly to be a tasklist for me not to forget to make this app better.    

## Technical Todos


- we have to ensure the fonts will stay cached in the client computer, and if we could, avoid them being deleted when we clear the browser cache. Maybe working with HTML5 Cache...

### Database implementation
Maybe some other DB interfaces could be added but it's not the most urgent thing to do.

### Minifying css/js
The CSS and JS files must be minified/packed before including them.

### User accounts
It could be relevant to create an authentication page, or at least a very simple authentication to allow users to set their own default font, to modify some of the texts displayed, to change the languages...


## Design Todos

### The Ugly Css
The CSS is quite ugly...
#### Rewrite it more cleanly (under Sass)
960gs is really not the best framework to use here
#### Implementing some other functions
We could build a lightweight jquery plugin to allow the user to change the line-height, the gap between headers, the font  weights… but still respecting the vertical rythm

