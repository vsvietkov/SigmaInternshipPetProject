import React from "react";

export function SquareImage(props) {
  return (
    <div className="row">
      <svg viewBox="0 0 100 30">
        <polygon points="40,25 40,5 60,5 60,25" className="svgFigurePolygon" />
        <polygon points="40,25 60,5" className="svgFigurePolygon" />
      </svg>
    </div>
  )
}
