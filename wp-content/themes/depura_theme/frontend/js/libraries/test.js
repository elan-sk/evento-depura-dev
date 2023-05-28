import { CONTAINERS, cols, preCOLS } from "../libraries/utils";

document.addEventListener("DOMContentLoaded", function () {
  //Configuración  de test --------------------
  const classComponent = ".test";
  let isComponent = true;
  let isTitlePage = false;

  //variables
  const d = document;
  const nombreComponente = d.querySelector(classComponent).classList[0];
  const $testComponent = $(classComponent);
  let mensaje = "";
  let conPrueba = 0;
  let pruebaValida = 0,
    pruebaInvalida = 0,
    contador = 0;

  //Cargando algunas
  if ($testComponent.hasClass('test-no-component')) isComponent = false;
  if ($testComponent.hasClass('test-title-page')) isTitlePage = true;


  mensaje =
    "!!!PRUEBAS DE CALIDAD DEl COMPONENTE: " + nombreComponente + "-------";
  //FUNCIONES=============================================================
  //Validas y muestra el mensaje de las pruebas negativas
  function error(consolLog, $elemento, errorText) {
    if (consolLog) {
      validarPrueba(false);
      mensaje += `${consolLog} \u2718`;
    }

    if ($elemento && errorText) {
      $elemento.addClass("test-error");
      const $contentMensaje = $elemento.find(">.test-error__content-mensaje");
      if ($contentMensaje.length) {
        $contentMensaje.append(`
        <cite class="test-error__mensaje">${errorText}<cite>
        `);
      } else {
        $elemento.append(`
        <div class="test-error__content-mensaje">
        <cite class="test-error__mensaje">${errorText}<cite>
        </div>
        `);
      }
    }
    return true;
  }

  //Validas y muestra el mensaje de las pruebas positivos
  function ok(consolLog) {
    validarPrueba(true);
    mensaje += `${consolLog} \u2714`;
    return true;
  }

  //Mostrar etiquetas
  function etiqueta($elemento, etiquetaText) {
    if ($elemento && etiquetaText) {
      $elemento.addClass("test-etiqueta");
      const $contentMensaje = $elemento.find(">.test-etiqueta__content-mensaje");
      if ($contentMensaje.length) {
        $contentMensaje.append(`
        <cite class="test-etiqueta__mensaje">${etiquetaText}<cite>
        `);
      } else {
        $elemento.append(`
        <div class="test-etiqueta__content-mensaje">
        <cite class="test-etiqueta__mensaje">${etiquetaText}<cite>
        </div>
        `);
      }
    }
    return true;
  }

  //Crea el encabezado de las pruebas
  function numerador() {
    conPrueba++;
    mensaje += `
    ${conPrueba}. `;
    return true;
  }

  //LLeva la  cuenta de las pruebas correctas e incorrectas
  function validarPrueba(isCorrect) {
    if (isCorrect) {
      pruebaValida++;
    } else {
      pruebaInvalida++;
    }
    return true;
  }
  //FIN FUNCIONES========================================================

  //Asignar la clase de prueba al componente
  $testComponent.addClass("test-component");

  // Moverse al lugar donde está en component
  $("html, body").animate(
    {
      scrollTop: $testComponent.offset().top,
    },
    2000
  );

  //Cambiar la variable css (--content-pseudo) Para que muestre el nombre de la clase
  d.querySelector(classComponent).style.setProperty(
    "--content-pseudo",
    "'" + nombreComponente + "'"
  );

  //prueba de ser una section
  if (isComponent) {
    numerador();
    if ($testComponent.prop("tagName") == "SECTION") {
      ok(`El componente es un ${$testComponent.prop("tagName")}`);
    } else {
      error(
        `El componente no es un SECTION, es un ${$testComponent.prop(
          "tagName"
        )}`,
        $testComponent,
        "No es SECTION"
      );
    }
  }

  //El componente tiene container
  numerador();
  contador = 0;
  CONTAINERS.forEach(function (container) {
    $testComponent.find("*").each(function () {
      if ($(this).hasClass(container)) contador++;
    });
  });
  if (contador) {
    ok(`El componente contiene un .container`);
  } else {
    error(
      `El componente no contiene un .container`,
      $testComponent,
      "Componente sin .container"
    );
  }

  //prueba no hay un h1
  if (!isTitlePage) {
    numerador();
    if ($testComponent.find("h1").length) {
      error(`El componente contiene un H1`, $testComponent.find("h1"), "H1");
    } else {
      ok(`El componente no contiene un H1`);
    }
  }

  //No hay section dentro del componente
  numerador();
  if ($testComponent.find("section").length) {
    error(
      `Existe SECTION dentro del componente`,
      $testComponent.find("section"),
      "SECTION interno"
    );
  } else {
    ok(`No hay SECTION dentro del componente`);
  }

  //.todos los row tienen g-0
  numerador();
  contador = 0;
  if ($testComponent.find(".row").length) {
    $testComponent.find(".row").each(function () {
      if (!$(this).hasClass("g-0")) {
        contador++;
        error(false, $(this), `.row sin g-0`);
      }
    });
    if (contador) {
      error(`Existen .row sin su g-0`);
    } else {
      ok(`Todos los .row tienen g-0`);
    }
  } else {
    ok(`No hay .row dentro del componente`);
  }

  //No hay container dentro de otro container
  numerador();
  contador = 0;
  CONTAINERS.forEach(function (classContainer) {
    $testComponent.find("." + classContainer).each(function () {
      const $container = $(this);
      CONTAINERS.forEach(function (ClassContainerInterno) {
        if ($container.find("." + ClassContainerInterno).length) contador++;
        error(
          false,
          $container.find("." + ClassContainerInterno),
          `.container dentro de otro`
        );
      });
    });
  });
  if (contador) {
    error(`Hay .container dentro otro`);
  } else {
    ok(`No existen .container dentro de otro`);
  }

  //Los col suman menos o igual a
  numerador();
  contador = 0;

  if ($testComponent.find(".row").length) {
    let mensajeInterno = "La suma de los ";

    $testComponent.find(".row").each(function () {
      preCOLS.forEach((preCOL) => {
        let sumaCOL = 0;

        for (let index = 1; index <= 12; index++) {
          let $col = $(this).find("." + preCOL + index);
          $col.each(function(){

            if ($col.length && $col.css("display") !== "none" && index !== 12) {
              sumaCOL += index;
            }
          });
        }

        if (sumaCOL !== 12 && sumaCOL !== 0) {
          mensajeInterno += `(${preCOL} = ${sumaCOL}), `;
          contador++;
          error(false, $(this), `(suma"${preCOL}") != 12`);
        }
      });
    });
    mensaje += mensajeInterno;
  }

  if(contador){
    error(`son diferente a 12`);
  }else {
    ok(`"cols" son iguales a 12`);
  }

  //Ayuda visuales
  $testComponent.find('*').each(function(){
    if ($(this).css('display')=='flex') {
      $(this).addClass('test-flex');

      if (!$(this).hasClass('row')) {
        etiqueta($(this),'flex');
      }
    }
    if ($(this).css('display')=='grid') {
      $(this).addClass('test-grid');
      etiqueta($(this),'grid');
    }
  });

  //Final mostrar mensaje @@@@@@@@@@@@
  setTimeout(() => {
    // alert('entre');
  }, 3000);

  let testOk = mensaje ? false : true;

  mensaje += `
  ----------------------------------------
      Pruebas correctas: ${pruebaValida}
      Pruebas incorrectas: ${pruebaInvalida}
!!!Fin PRUEBAS DE CALIDAD ----------------
  `;
  console.log(mensaje);
  // alert(mensaje);
});
