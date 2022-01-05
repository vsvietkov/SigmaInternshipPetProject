import React from "react";
import {Input} from "../../input";
import {CircleInputs} from "../2D/circleInputs";

export function CylinderInputs(props) {
  return (
    <>
      <CircleInputs />
      <div className="row my-2">
        <Input
          label="Altitude"
          name="altitude"
        />
        <div className="col"></div>
      </div>
    </>
  )
}
