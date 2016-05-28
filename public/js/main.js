(function() {
    var projects = document.querySelectorAll(".project > a");

    projects = Array.from(projects);

    var uniqueTechnologies = [];

    projects.forEach(function(project) {
        var projectTechnologies = project.dataset.technologies.split(", ");

        projectTechnologies.forEach(function(technology) {
            var skillContainer = document.querySelector(".skill-container");
            
            if(skillContainer.innerHTML.indexOf(technology) == -1) {
                uniqueTechnologies.push("<span>" + technology + "</span>");
            }
        });
    });

    for (var i = uniqueTechnologies.length - 1; i > 0; i--) {
        var j = Math.floor(Math.random() * (i + 1));
        var temp = uniqueTechnologies[i];
        uniqueTechnologies[i] = uniqueTechnologies[j];
        uniqueTechnologies[j] = temp;
    }

    document.querySelector(".skill-container").innerHTML = uniqueTechnologies.join("");

    var technologies = document.querySelectorAll(".skill-container > span");

    technologies = Array.from(technologies);

    projects.forEach(function(project) {
        project.addEventListener("mouseover", function() {
            var projectTechnologies = project.dataset.technologies.split(", ");

            projectTechnologies.forEach(function(projectTechnology) {
                technologies.forEach(function(technology) {
                    if(projectTechnology == technology.innerHTML) {
                        technology.classList.add("highlight");
                    }
                });
            });
        });

        project.addEventListener("mouseout", function() {
            technologies.forEach(function(technology) {
                technology.classList.remove("highlight");
            });
        });
    });

    technologies.forEach(function(technology) {
        technology.addEventListener("mouseover", function() {
            projects.forEach(function(project) {
                var projectTechnologies = project.dataset.technologies.split(", ");

                if(projectTechnologies.indexOf(technology.innerHTML) != -1) {
                    project.classList.add("highlight");
                }
            });
        });

        technology.addEventListener("mouseout", function() {
            projects.forEach(function(project) {
                project.classList.remove("highlight");
            });
        });
    });
})();