import {CircleInputs} from "../figureInputs/2D/circleInputs";
import {Inputs2D} from "../figureInputs/default2Dinputs";
import {Inputs3D} from "../figureInputs/default3Dinputs";
import {SphereInputs} from "../figureInputs/3D/sphereInputs";
import {CircleImage} from "../figureImages/circleImage";
import {SphereImage} from "../figureImages/sphereImage";
import {CubeImage} from "../figureImages/cubeImage";
import {SquareImage} from "../figureImages/squareImage";
import {SquareInputs} from "../figureInputs/2D/squareInputs";
import {CubeInputs} from "../figureInputs/3D/cubeInputs";

export function clearErrorSpans() {
  document.querySelectorAll('.input-error').forEach(element => {
    element.innerHTML = ''
  })
}

export function getFigureImage(figureName) {
  switch (figureName) {
    case 'Circle':
      return <CircleImage />
    case 'Square':
      return <SquareImage />
    case 'Sphere':
      return <SphereImage />
    case 'Cube':
      return <CubeImage />
    default:
      return <></>
  }
}

export function getFigureInputs(figureName) {
  switch (figureName) {
    case 'Circle':
      return <CircleInputs />
    case 'Square':
      return <SquareInputs />
    case 'Sphere':
      return <SphereInputs />
    case 'Cube':
      return <CubeInputs />
    default:
      return <></>
  }
}

export function getDefaultInputs(currentFigureName) {
  if (FIGURES_2D.includes(currentFigureName)) {
    return <Inputs2D />
  } else if (FIGURES_3D.includes(currentFigureName)) {
    return <Inputs3D />
  }

  return <></>
}

export const FIGURES_2D = [
  'Circle',
  'Square',
]

export const FIGURES_3D = [
  'Sphere',
  'Cube',
]
