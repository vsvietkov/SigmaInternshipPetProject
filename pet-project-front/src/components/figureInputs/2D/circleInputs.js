import React from "react";
import {Input} from "../../input";

export function CircleInputs(props) {
  return (
    <div className="row my-2">
      <Input
        label="Radius"
        name="radius"
      />
      <Input
        label="Diameter"
        name="diameter"
      />
    </div>
  )
}
