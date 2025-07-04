(function () {
  var projects = document.querySelectorAll(".project > a");

  projects = Array.prototype.slice.call(projects);

  var uniqueTechnologies = [];

  projects.forEach(function (project) {
    var projectTechnologies = project.dataset.technologies.split(", ");

    projectTechnologies.forEach(function (technology) {
      var technologyElement = "<span>" + technology.trim() + "</span>";

      if (uniqueTechnologies.indexOf(technologyElement) == -1) {
        uniqueTechnologies.push(technologyElement);
      }
    });

    project.addEventListener("mouseover", function () {
      var projectTechnologies = project.dataset.technologies.split(", ");

      projectTechnologies.forEach(function (projectTechnology) {
        technologies.forEach(function (technology) {
          if (projectTechnology == technology.innerHTML) {
            technology.classList.add("highlight");
          }
        });
      });
    });

    project.addEventListener("mouseout", function () {
      technologies.forEach(function (technology) {
        technology.classList.remove("highlight");
      });
    });
  });

  uniqueTechnologies.sort();

  document.querySelector(".skill-container").innerHTML =
    uniqueTechnologies.join("");

  var technologies = document.querySelectorAll(".skill-container > span");

  technologies = Array.prototype.slice.call(technologies);

  technologies.forEach(function (technology) {
    technology.addEventListener("mouseover", function () {
      projects.forEach(function (project) {
        var projectTechnologies = project.dataset.technologies.split(", ");

        if (projectTechnologies.indexOf(technology.innerHTML) != -1) {
          project.classList.add("highlight");
        }
      });
    });

    technology.addEventListener("mouseout", function () {
      projects.forEach(function (project) {
        project.classList.remove("highlight");
      });
    });
  });
})();
