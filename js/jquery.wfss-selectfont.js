$(function() {

    // 1) Lazy-Load the fonts
    lazyLoadFonts(fonts);

    // 2) Stylish Select modified, updates body font when selecting a font in the list
    var select = $('#font_select'),
        nameDiv = $('#font-name'),
        startVal = select.val(),
        style,
        format,
        path;

    select.sSelect({
        ddMaxHeight: '400px'
    });


    select.change(function() {
        val = $(this).val(), // font name
        format = $('option:selected', this).dataset('format'), // formats available
        path = $('option:selected', this).dataset('path'); // path to the font files
        document.body.style.fontFamily = '"' + val + '"';
        document.getElementById('bodysize-font-name').innerHTML = val;
        //style = $(buildCSSDeclaration(startVal, path, format)); // create the style declaration
        //style.appendTo('body'); // append to body
        document.title = val + ' - Web[iche] Font Specimen'; // set the right page title
        nameDiv.html(val); // set the font name as new page heading
    });
});

function lazyLoadFonts(fonts) {
    //console.log(fonts);
    var head = document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';

    if (style.styleSheet) {
        style.styleSheet.cssText = fonts;
    } else {
        style.appendChild(document.createTextNode(fonts));
    }
    head.appendChild(style);
}

// we'll keep these functions for later
// function buildCSSDeclaration(name, path, format, weight, style, variant) {
//     var weight = weight || 'normal',
//     style = style || 'normal',
//     variant = variant || 'normal';
//     return (format == 'fontface' ? buildCompleteCSSDeclaration(name, path, weight, style, variant) : buildFallbackCSSDeclaration(name, path, format, weight, style, variant));
// }
// function buildCompleteCSSDeclaration(name, path, weight, style, variant) {
//     return '<style>'+
//             '@font-face {'+
//                 'font-family: "'+name+'";'+
//                 'src: url("'+path+'.eot");'+
//                 'src: url("'+path+'.eot?#iefix") format("embedded-opentype"),'+
//                     'url("'+path+'.woff") format("woff"),'+
//                     'url("'+path+'.ttf") format("truetype"),'+
//                     'url("'+path+'.svg#'+name+'") format("svg");'+
//                 'font-style: '+style+';'+
//                 'font-weight: '+weight+';'+
//                 'font-variant: '+variant+';'+
//             '}'+
//             'body {'+
//                 'font-family: '+name+', Georgia;'+
//             '}'+
//         '</style>';
// }
// function buildFallbackCSSDeclaration(name, path, format, weight, style, variant) {
//     return '<style>'+
//             '@font-face {'+
//                 'font-family: "'+name+'";'+
//                 'src: url("'+path+'.'+format+'") format("'+(format == 'ttf' ? 'truetype' : 'opentype')+'");'+
//                 'font-style: '+style+';'+
//                 'font-weight: '+weight+';'+
//                 'font-variant: '+variant+';'+
//             '}'+
//             'body {'+
//                'font-family: "'+name+'", Georgia;'+
//             '}'+
//         '</style>';
// }