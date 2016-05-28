(function() {
    var rawProjects = document.querySelectorAll(".project > a"),
        uniqueTechnologies = [];

    for (var i = 0; i < rawProjects.length; i++) {
        var technologies = rawProjects[i].dataset.technologies.split(", ");

        for(var j = 0; j < technologies.length; j++) {
            var technology = "<span>" +  technologies[j]  + "</span>";

            if((uniqueTechnologies.indexOf(technology)) == -1) {
                uniqueTechnologies.push(technology);
            }
        }

        rawProjects[i].onmouseover = function() {
            var hoverTechnologies = this.dataset.technologies.split(", ");

            var spanTechnologies = document.querySelectorAll(".skill-container > span");

            for(var k = 0; k < hoverTechnologies.length; k++) {
                var hoverTechnology = hoverTechnologies[k];

                for(var l = 0; l < spanTechnologies.length; l++) {
                    var technologyEl = spanTechnologies[l];
                    var technologyString = technologyEl.innerHTML;

                    if( hoverTechnology == technologyString) {
                        technologyEl.classList = 'highlight';
                    }
                }
            }
        };

        rawProjects[i].onmouseout  = function() {
            var spanTechnologies = document.querySelectorAll(".skill-container > span");

            for(var k = 0; k < spanTechnologies.length; k++) {
                spanTechnologies[k].classList = '';
            }
        };
    }

    for (var i = uniqueTechnologies.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = uniqueTechnologies[i];
        uniqueTechnologies[i] = uniqueTechnologies[j];
        uniqueTechnologies[j] = temp;
    }

    document.querySelector(".skill-container").innerHTML = uniqueTechnologies.join("");

    var spanTechnologies = document.querySelectorAll(".skill-container > span");

    for(var i = 0; i < spanTechnologies.length; i++) {

        spanTechnologies[i].onmouseover = function() {
            var technologyString = this.innerHTML;

            for(var j = 0; j < rawProjects.length; j++) {
                var projectTechnologies = rawProjects[j].dataset.technologies.split(", ");

                if(projectTechnologies.indexOf(technologyString) != -1) {
                    rawProjects[j].classList = 'highlight';
                }
            }
        };

        spanTechnologies[i].onmouseout  = function() {
            for(var i = 0; i < rawProjects.length; i++) {
                rawProjects[i].classList = '';
            }
        };
    }
})();