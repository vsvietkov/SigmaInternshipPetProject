import React from "react";

export function Selector(props) {
    return (
        <div className="col-md-5">
            <select className="form-select" aria-label="Default select example">
                <option disabled>2D figures</option>
                <option value="circle" selected>Circle</option>
                <option value="triangle">Triangle</option>
                <option value="quadrangle">Quadrangle</option>
                <option value="square">Square</option>
                <option value="rectangle">Rectangle</option>
                <option value="trapezoid">Trapezoid</option>
                <option value="parallelogram">Parallelogram</option>
                <option disabled>3D figures</option>
                <option value="sphere">Sphere</option>
                <option value="cylinder">Cylinder</option>
                <option value="cube">Cube</option>
                <option value="parallelepiped">Parallelepiped</option>
            </select>
        </div>
    );
}
