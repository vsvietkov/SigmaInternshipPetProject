import React, {useContext} from "react";
import {Input} from "../input";
import {Context} from "../../App";

export function Inputs3D(props) {
  let figure = useContext(Context)
  return (
    <div className="row my-2">
      <Input
        label="Area:"
        name={figure + '_area'}
      />
      <Input
        label="Volume:"
        name={figure + '_volume'}
      />
    </div>
  );
}
