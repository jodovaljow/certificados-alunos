import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DashboardCertificadosComponent } from './dashboard-certificados.component';

describe('DashboardCertificadosComponent', () => {
  let component: DashboardCertificadosComponent;
  let fixture: ComponentFixture<DashboardCertificadosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DashboardCertificadosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DashboardCertificadosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
