import React from "react";

export function RectangleImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="30,25 30,5 70,5 70,25" className="svgFigurePolygon" />
        <polygon points="30,25 70,5" className="svgFigurePolygon" />
        <text x="23" y="17" className="svgSmallLabel">a</text>
        <text x="50" y="24" className="svgSmallLabel">b</text>
      </svg>
    </div>
  )
}
