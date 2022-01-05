import React from "react";
import {Input} from "../input";

export function Inputs3D(props) {
  return (
    <div className="row my-2">
      <Input
        label="Area"
        name="area"
      />
      <Input
        label="Volume"
        name="volume"
      />
    </div>
  );
}
