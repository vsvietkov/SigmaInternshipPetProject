import React from "react";
import {Input} from "../input";

export function Inputs2D(props) {
  let secondInputName = props.figure === 'Circle' ? 'circumference' : 'perimeter';
  return (
    <div className="row my-2">
      <Input
        label="Area:"
        name="area"
      />
      <Input
        label={secondInputName.charAt(0).toUpperCase() + secondInputName.slice(1) + ':'}
        name={secondInputName}
      />
    </div>
  );
}
