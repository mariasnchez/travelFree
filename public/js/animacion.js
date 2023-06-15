document.addEventListener("DOMContentLoaded", function() {

    
    
    var tiempo = anime.timeline({
            duration: 800
    });

    tiempo.add({
        targets: '#fondo',
        translateY: [200,0]})
    .add({
        targets: '#imagen',
        translateY: [-300,0]
    },'-=400')
    
    .add({
        targets: '#imagen',
        rotate: 180
        }, '-=400')
    .add({
        targets: "#fondo",
        rotate: 4 
        },'-=400')
    .add({
        targets: '#imagen',
        rotate: 360
        },'-=400')
    .add({  
        targets: '#fondo',
        rotate: 0
        });
        
   



});