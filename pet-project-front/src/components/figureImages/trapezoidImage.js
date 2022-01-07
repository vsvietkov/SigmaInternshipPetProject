import React from "react";

export function TrapezoidImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="20,25 40,5 60,5 80,25" className="svgFigurePolygon" />
        <polygon points="40,5 40,25" className="svgFigurePolygon" />
        <text x="25" y="13" className="svgSmallLabel">a</text>
        <text x="70" y="13" className="svgSmallLabel">a</text>
        <text x="48" y="23" className="svgSmallLabel">b</text>
        <text x="48" y="10" className="svgSmallLabel">c</text>
        <text x="35" y="19" className="svgSmallLabel">h</text>
      </svg>
    </div>
  )
}
