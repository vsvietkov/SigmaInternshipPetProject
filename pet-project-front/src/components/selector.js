import React from "react";

export function Selector(props) {
    return (
        <div className="col-md-5">
            <select
              name="shape"
              className="form-select shadow-none"
              onChange={props.onchange}
              defaultValue='circle'
            >
                <option disabled>2D figures</option>
                <option defaultValue="circle">Circle</option>
                <option defaultValue="triangle">Triangle</option>
                <option defaultValue="quadrangle">Quadrangle</option>
                <option defaultValue="square">Square</option>
                <option defaultValue="rectangle">Rectangle</option>
                <option defaultValue="trapezoid">Trapezoid</option>
                <option defaultValue="parallelogram">Parallelogram</option>
                <option disabled>3D figures</option>
                <option defaultValue="sphere">Sphere</option>
                <option defaultValue="cylinder">Cylinder</option>
                <option defaultValue="cube">Cube</option>
                <option defaultValue="parallelepiped">Parallelepiped</option>
            </select>
        </div>
    );
}
