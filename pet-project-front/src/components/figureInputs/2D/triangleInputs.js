import React from "react";
import {Input} from "../../input";

export function TriangleInputs(props) {
  return (
    <>
      <div className="row my-2">
        <Input
          id="cathetusA"
          label="CA:"
          name="Triangle_cathetusA"
        />
        <Input
          id="cathetusB"
          label="CB:"
          name="Triangle_cathetusB"
        />
      </div>
      <div className="row my-2">
        <Input
          id="hypotenuse"
          label="AB:"
          name="Triangle_hypotenuse"
        />
        <Input
          id="altitude"
          label="Altitude(CH):"
          name="Triangle_altitude"
        />
      </div>
      <div className="row my-2">
        <Input
          id="angleA"
          label="Angle A:"
          name="Triangle_angleA"
        />
        <Input
          id="angleB"
          label="Angle B:"
          name="Triangle_angleB"
        />
      </div>
    </>
  )
}
