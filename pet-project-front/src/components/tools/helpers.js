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
import {TriangleImage} from "../figureImages/triangleImage";
import {QuadrangleImage} from "../figureImages/quadrangleImage";
import {RectangleImage} from "../figureImages/rectangleImage";
import {SquareImage} from "../figureImages/squareImage";
import {TrapezoidImage} from "../figureImages/trapezoidImage";
import {ParallelogramImage} from "../figureImages/parallelogramImage";
import {SquareInputs} from "../figureInputs/2D/squareInputs";
import {RectangleInputs} from "../figureInputs/2D/rectangleInputs";
import {TrapezoidInputs} from "../figureInputs/2D/trapezoidInputs";
import {TriangleInputs} from "../figureInputs/2D/triangleInputs";
import {ParallelogramInputs} from "../figureInputs/2D/parallelogramInputs";
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
    case 'Triangle':
      return <TriangleImage />
    case 'Quadrangle':
      return <QuadrangleImage />
    case 'Square':
      return <SquareImage />
    case 'Rectangle':
      return <RectangleImage />
    case 'Trapezoid':
      return <TrapezoidImage />
    case 'Parallelogram':
      return <ParallelogramImage />
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
    case 'Triangle':
      return <TriangleInputs />
    case 'Square':
      return <SquareInputs />
    case 'Rectangle':
      return <RectangleInputs />
    case 'Trapezoid':
      return <TrapezoidInputs />
    case 'Parallelogram':
      return <ParallelogramInputs />
    case 'Sphere':
      return <SphereInputs />
    case 'Cylinder':
      return <CylinderInputs />
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
