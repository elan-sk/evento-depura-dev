const serialize = function (form) {
  let arr = [];
  Array.prototype.slice.call(form.elements).forEach(function (field) {
    if (
      !field.name ||
      field.disabled ||
      ["reset", "submit", "button"].indexOf(field.type) > -1
    )
      return;
    if (field.type === "select-multiple") {
      Array.prototype.slice.call(field.options).forEach(function (option) {
        if (!option.selected) return;
        arr.push(
          encodeURIComponent(field.name) +
            "=" +
            encodeURIComponent(option.value)
        );
      });
      return;
    }
    if (["checkbox", "radio"].indexOf(field.type) > -1 && !field.checked)
      return;
    arr.push(
      encodeURIComponent(field.name) + "=" + encodeURIComponent(field.value)
    );
  });
  return arr.join("&");
};

const BREAKPOINTS = new Map ();
BREAKPOINTS.set('xs' , 250 - 1);
BREAKPOINTS.set('s' , 576 - 1);
BREAKPOINTS.set('m' , 768 - 1);
BREAKPOINTS.set('l' , 992 - 1);
BREAKPOINTS.set('xl' , 1200 - 1);

const containerMaxWidths = new Map ();
containerMaxWidths.set ('xs', 250);
containerMaxWidths.set ('s', 540);
containerMaxWidths.set ('m', 720);
containerMaxWidths.set ('l', 960);
containerMaxWidths.set ('xl', 1320);

const responsiveSlider = function (widthItem, padding = 0, verbose = false) {
  const numbersSliders = {};

  containerMaxWidths.forEach((value,key) => {
    let numberSlider = Math.floor((value - padding * 2)  / widthItem);
    numberSlider = numberSlider == 0 ? 1 : numberSlider;
    numbersSliders[key] = numberSlider;
  })

  if(verbose){
    for (const numberSlider in numbersSliders) {
      console.log(`${numberSlider}(${BREAKPOINTS.get(numberSlider)+1}):${numbersSliders[numberSlider]}`);
    }
  }

  return numbersSliders;
};

const responsiveSliderNumXs = function (numberSliderXs, padding = 0, verbose = false) {
  const widthItem = (containerMaxWidths.get('xs') - padding * 2) / numberSliderXs;

  return responsiveSlider(widthItem, padding, verbose);
};

const responsiveSliderNumL = function (numberSliderL, padding = 0, verbose = false) {
  const widthItem = (containerMaxWidths.get('l') - padding * 2) / numberSliderL;

  return responsiveSlider(widthItem, padding, verbose);
};

const daysInMonth = function ($select, year, month) {
  const days = new Date(year, month, 0).getDate();

  for (let i = $select.options.length; i >= 1; i--) {
    $select.remove(i);
  }

  for (let i = 1; i <= days; i++) {
    const option = document.createElement('option');
    option.value = i;
    option.text = i;
    $select.appendChild(option);
  }
}

//Clases de Boostrap
const CONTAINERS = [
  "container",
  "container-sm",
  "container-md",
  "container-lg",
  "container-xl",
  "container-xxl",
  "container-fluid",
];

const preCOLS = [
  "col-",
  "col-sm-",
  "col-md-",
  "col-lg-",
  "col-xl-",
];

let cols = [];
preCOLS.forEach((preCOL) => {
  for (let index = 1; index <= 12; index++) {
    cols.push(preCOL+index);
  }
});

export { serialize, responsiveSliderNumL, responsiveSliderNumXs, BREAKPOINTS, daysInMonth, CONTAINERS, preCOLS, cols };

