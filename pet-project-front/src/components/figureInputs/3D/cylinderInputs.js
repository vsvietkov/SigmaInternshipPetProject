import React from "react";
import {Input} from "../../input";
import {CircleInputs} from "../2D/circleInputs";

export function CylinderInputs(props) {
  return (
    <>
      <CircleInputs />
      <div className="row my-2">
        <Input
          id="altitude"
          label="Altitude:"
          name="Cylinder_altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
