import {CircleInputs} from "../figureInputs/2D/circleInputs";
import {Inputs2D} from "../figureInputs/default2Dinputs";
import {Inputs3D} from "../figureInputs/default3Dinputs";
import {SphereInputs} from "../figureInputs/3D/sphereInputs";
import {CylinderInputs} from "../figureInputs/3D/cylinderInputs";
import {CircleImage} from "../figureImages/circleImage";
import {SphereImage} from "../figureImages/sphereImage";
import {CylinderImage} from "../figureImages/cylinderImage";
import {CubeImage} from "../figureImages/cubeImage";
import {ParallelepipedImage} from "../figureImages/parallelepipedImage";

export function clearErrorSpans() {
  document.querySelectorAll('.input-error').forEach(element => {
    element.innerHTML = ''
  })
}

export function getFigureImage(figureName) {
  switch (figureName) {
    case 'Circle':
      return <CircleImage />
    case 'Sphere':
      return <SphereImage />
    case 'Cylinder':
      return <CylinderImage />
    case 'Cube':
      return <CubeImage />
    case 'Parallelepiped':
      return <ParallelepipedImage />
    default:
      return <></>
  }
}

export function getFigureInputs(figureName) {
  switch (figureName) {
    case 'Circle':
      return <CircleInputs />
    case 'Sphere':
      return <SphereInputs />
    case 'Cylinder':
      return <CylinderInputs />
    default:
      return <></>
  }
}

export function getDefaultInputs(currentFigureName) {
  if (FIGURES_2D.includes(currentFigureName)) {
    return <Inputs2D figure={currentFigureName} />
  } else if (FIGURES_3D.includes(currentFigureName)) {
    return <Inputs3D figure={currentFigureName} />
  }

  return <></>
}

export const FIGURES_2D = [
  'Circle',
  'Triangle',
  'Quadrangle',
  'Square',
  'Rectangle',
  'Trapezoid',
  'Parallelogram',
]

export const FIGURES_3D = [
  'Sphere',
  'Cylinder',
  'Cube',
  'Parallelepiped',
]
