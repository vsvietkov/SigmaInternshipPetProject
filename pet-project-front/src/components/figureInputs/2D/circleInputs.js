import React from "react";
import {Input} from "../../input";

export function CircleInputs(props) {
  return (
    <div className="row my-2">
      <Input
        id="radius"
        label="Radius:"
        name="radius"
      />
      <Input
        id="diameter"
        label="Diameter:"
        name="Circle_diameter"
      />
    </div>
  )
}
