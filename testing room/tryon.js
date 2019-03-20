
$('.draggable').draggable();

$('.resizable').resizable({
    aspectRatio: true,
    handles: 'ne, se, sw, nw'
});

$('.resizable').parent().rotatable();