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
                <option defaultValue="square">Square</option>
                <option disabled>3D figures</option>
                <option defaultValue="sphere">Sphere</option>
                <option defaultValue="cube">Cube</option>
            </select>
            <span id="shape-error" className="text-danger input-error px-1"></span>
        </div>
    );
}
