import React, {useContext} from "react";
import {Input} from "../input";
import {Context} from "../../App";

export function Inputs2D(props) {
  let figure = useContext(Context)
  return (
    <div className="row my-2">
      <Input
        id="area"
        label='Area:'
        name={figure + '_area'}
      />
      <Input
        id="perimeter"
        label="Perimeter:"
        name={figure + '_perimeter'}
      />
    </div>
  );
}
