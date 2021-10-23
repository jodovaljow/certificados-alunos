import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GridCertificadosComponent } from './grid-certificados.component';

describe('GridCertificadosComponent', () => {
  let component: GridCertificadosComponent;
  let fixture: ComponentFixture<GridCertificadosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GridCertificadosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GridCertificadosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
