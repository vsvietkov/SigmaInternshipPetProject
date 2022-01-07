import React from "react";
import {Input} from "../../input";

export function TriangleInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          label="CA:"
          name="cathetusA"
        />
        <Input
          label="CB:"
          name="cathetusB"
        />
      </div>
      <div className="row my-2">
        <Input
          label="AB:"
          name="hypotenuse"
        />
        <Input
          label="Altitude(CH):"
          name="altitude"
        />
      </div>
      <div className="row my-2">
        <Input
          label="Angle A:"
          name="angleA"
        />
        <Input
          label="Angle B:"
          name="angleB"
        />
      </div>
    </>
  )
}
